<?php

namespace App\Providers;

use App\Models\Category;
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
        View::composer(['pages.*', 'user.*'], function ($view) {
            $categories = Category::with('media')->orderBy('order')->get();

            $view->with([
                'headerCategories' => $categories->where('in_menu', true),
                'pageCategories'   => $categories->where('in_page', true),
                'settings'         => $this->getSettings(),
            ]);
        });
    }

    private function defineFilamentSettingsFields()
    {
        \Reworck\FilamentSettings\FilamentSettings::setFormFields([
            \Filament\Forms\Components\TextInput::make('homeTitle')->translateLabel(),
            \Filament\Forms\Components\TextInput::make('homeDescription')->translateLabel(),
            \Filament\Forms\Components\TextInput::make('shopTitle')->translateLabel(),
            \Filament\Forms\Components\TextInput::make('shopDescription')->translateLabel(),
            \Filament\Forms\Components\TextInput::make('instagramTitle')->translateLabel(),
            \Filament\Forms\Components\TextInput::make('instagramLink')->translateLabel(),
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
