<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    static null|string $label = 'سفارش';
    static null|string $pluralLabel = 'سفارشات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                Select::make('user_id')
                    ->relationship('user', 'fname')
                    ->preload()
                    ->translateLabel(),

                Select::make('status_id')
                    ->relationship('status', 'name')
                    ->preload()
                    ->translateLabel(),

                Forms\Components\Toggle::make('is_paid')
                    ->required()
                    ->translateLabel(),

                Forms\Components\TextInput::make('transaction')
                    ->maxLength(255)
                    ->translateLabel(),

                Forms\Components\Textarea::make('result')
                    ->maxLength(65535)
                    ->translateLabel(),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->translateLabel(),

                Forms\Components\TextInput::make('ip')
                    ->required()
                    ->maxLength(45)
                    ->translateLabel(),

                Forms\Components\Textarea::make('comment')
                    ->maxLength(255)
                    ->translateLabel(),

                Forms\Components\TextInput::make('uuid')
                    ->required()
                    ->maxLength(36)
                    ->translateLabel(),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->sortable()->translateLabel(),
                Tables\Columns\TextColumn::make('status_id')->sortable()->translateLabel(),
                Tables\Columns\IconColumn::make('is_paid')->sortable()->boolean()->translateLabel(),
                // Tables\Columns\TextColumn::make('transaction')->translateLabel(),
                // Tables\Columns\TextColumn::make('result')->translateLabel(),
                Tables\Columns\TextColumn::make('price')->sortable()->translateLabel(),
                // Tables\Columns\TextColumn::make('ip')->translateLabel(),
                Tables\Columns\IconColumn::make('comment')->translateLabel(),
                // Tables\Columns\TextColumn::make('uuid')->translateLabel(),
                // Tables\Columns\TextColumn::make('deleted_at')->dateTime()->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->translateLabel(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->translateLabel(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }    
}
