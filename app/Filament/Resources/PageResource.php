<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    static null|string $label = 'صفحه';
    static null|string $pluralLabel = 'صفحات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(50)
                        ->translateLabel(),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(30)
                        ->translateLabel(),
                    TextInput::make('title')
                        ->maxLength(50)
                        ->translateLabel(),
                    TextInput::make('meta_description')
                        ->maxLength(250)
                        ->translateLabel(),
                    RichEditor::make('body')
                        ->required()
                        ->maxLength(65535)
                        ->fileAttachmentsDisk('images')
                        ->fileAttachmentsDirectory('attachments')
                        ->translateLabel(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')->translateLabel(),
                Tables\Columns\TextColumn::make('name')->translateLabel(),
                Tables\Columns\TextColumn::make('title')->translateLabel(),
                // Tables\Columns\TextColumn::make('meta_description')->translateLabel(),
                // Tables\Columns\TextColumn::make('body')->translateLabel(),
                // Tables\Columns\TextColumn::make('deleted_at')->dateTime()->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->translateLabel(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }    
}
