<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Valuestore\Valuestore;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->passVariablesToViews();
        $this->defineFilamentSettingsFields();
    }

    public function passVariablesToViews(): void
    {
        View::composer(['pages.*', 'user.*', 'auth.*'], function ($view) {
            $categories = Category::with('media')->orderBy('order')->get();

            $view->with([
                'headerCategories' => $categories->where('in_menu', true),
                'pageCategories'   => $categories->where('in_page', true),
                'settings'         => $this->getSettings(),
                'pages'            => Page::select('slug', 'name', 'deleted_at')->get(),
            ]);
        });
    }

    private function defineFilamentSettingsFields()
    {
        \Reworck\FilamentSettings\FilamentSettings::setFormFields([
            Card::make()->schema([
                TextInput::make('homeTitle')->translateLabel(),
                TextInput::make('homeDescription')->translateLabel(),
                TextInput::make('shopTitle')->translateLabel(),
                TextInput::make('shopDescription')->translateLabel(),
                TextInput::make('instagramLink')->translateLabel(),
                TextInput::make('instagramHeader')->translateLabel(),
                TextInput::make('instagramBox')->translateLabel(),
                TextInput::make('instagramButton')->translateLabel(),
                TextInput::make('footerDescription')->translateLabel(),
                Toggle::make('fullPageHero')->translateLabel(),
            ]),

            Card::make()->schema([
                Repeater::make('socials')->schema([
                    TextInput::make('image')
                        ->requiredWithout('icon')
                        ->placeholder('instagram.png')
                        ->translateLabel(),
                    TextInput::make('icon')
                        ->requiredWithout('image')
                        ->placeholder('fa-instagram')
                        ->translateLabel(),
                    TextInput::make('link')
                        ->url()
                        ->required()
                        ->translateLabel(),
                ])->columns(3)->translateLabel(),
            ]),

        ]);
    }

    private function getSettings(): object
    {
        $settings = Valuestore::make(config('filament-settings.path'))->all();
        $objectWithGetter = new class {public function __get($name){return $this->$name ?? '';}};
        $camelCasedSettings = array_combine(array_map(fn($key) => \Str::camel($key), array_keys($settings)), $settings);

        return $this->set_object_vars($objectWithGetter, $camelCasedSettings);
    }

    private function set_object_vars($object, array $vars) {
        foreach ($vars as $key => $value) {
            $object->$key = $value;
        }
        return $object;
    }
}
