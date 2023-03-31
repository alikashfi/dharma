<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    static null|string $label = 'محصول';
    static null|string $pluralLabel = 'محصولات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    SpatieMediaLibraryFileUpload::make('images')
                        ->multiple()
                        ->collection('product')
                        ->enableReordering()
                        ->maxSize(2048)
                        ->translateLabel(),

                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->preload()
                        ->translateLabel(),

                    TextInput::make('name')
                        ->required()
                        ->maxLength(30)
                        ->translateLabel(),

                    TextInput::make('title')
                        ->maxLength(50)
                        ->translateLabel(),

                    TextInput::make('slug')
                        ->required()
                        ->maxLength(30)
                        ->unique(ignoreRecord: true)
                        ->translateLabel(),

                    RichEditor::make('description')
                        ->maxLength(65535)
                        ->translateLabel(),

                    RichEditor::make('meta_description')
                        ->maxLength(65535)
                        ->translateLabel(),

                    TextInput::make('code')
                        ->maxLength(30)
                        ->unique(ignoreRecord: true)
                        ->translateLabel(),

                    TextInput::make('price')
                        ->numeric()
                        ->maxValue(16000000)
                        ->required()
                        ->translateLabel(),

                    Toggle::make('is_available')
                        ->required()
                        ->translateLabel(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                SpatieMediaLibraryImageColumn::make('images')->collection('product')->conversion('thumb')->translateLabel(),
                Tables\Columns\TextColumn::make('name')->sortable()->translateLabel(),
                Tables\Columns\TextColumn::make('price')->sortable()->translateLabel(),
                Tables\Columns\IconColumn::make('is_available')->boolean()->sortable()->translateLabel(),
                // Tables\Columns\IconColumn::make('is_active')->boolean()->sortable()->label('نمایش'),
                Tables\Columns\TextColumn::make('daily_views')->sortable()->translateLabel(),
                Tables\Columns\TextColumn::make('views')->sortable()->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->translateLabel(),
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
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
