<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    static null|string $label = 'پرداخت';
    static null|string $pluralLabel = 'پرداخت ها';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                Forms\Components\Toggle::make('is_paid')
                    ->required()
                    ->translateLabel(),

                Select::make('user_id')
                    ->relationship('user', 'fname')
                    ->preload()
                    ->translateLabel(),

                Select::make('order_id')
                    ->relationship('order', 'id'/*, fn (Builder $query) => $query->whereUserId(???)*/)
                    ->preload()
                    ->label(__('filament.order')),

                Forms\Components\TextInput::make('transaction')
                    ->maxLength(255)
                    ->translateLabel(),

                Forms\Components\Textarea::make('result')
                    ->maxLength(65535)
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
                Tables\Columns\TextColumn::make('order_id')->sortable()->translateLabel(),
                // Tables\Columns\TextColumn::make('transaction')->translateLabel(),
                // Tables\Columns\TextColumn::make('result')->translateLabel(),
                Tables\Columns\IconColumn::make('is_paid')->boolean()->sortable()->translateLabel(),
                // Tables\Columns\TextColumn::make('uuid')->translateLabel(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }    
}
