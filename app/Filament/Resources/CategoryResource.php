<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    static null|string $label = 'دسته';
    static null|string $pluralLabel = 'دسته ها';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([

                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('category')
                        ->maxSize(1024)
                        ->translateLabel(),

                    Select::make('parent_id')
                        ->relationship('parent', 'name')
                        ->preload()
                        ->translateLabel(),


                    TextInput::make('name')
                        ->required()
                        ->maxLength(30)
                        ->translateLabel(),

                    TextInput::make('title')
                        ->required()
                        ->maxLength(50)
                        ->translateLabel(),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(30)
                        ->translateLabel(),

                    RichEditor::make('description')
                        ->required()
                        ->maxLength(65535)
                        ->translateLabel(),

                    RichEditor::make('meta_description')
                        ->required()
                        ->maxLength(65535)
                        ->translateLabel(),

                    TextInput::make('order')
                        ->translateLabel(),

                    Toggle::make('in_menu')
                        ->required()
                        ->translateLabel(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')->collection('category')->conversion('thumb')->translateLabel(),
                Tables\Columns\TextColumn::make('name')->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }    
}
