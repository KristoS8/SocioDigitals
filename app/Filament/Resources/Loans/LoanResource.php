<?php

namespace App\Filament\Resources\Loans;

use BackedEnum;
use App\Models\Loan;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use App\Filament\Resources\Loans\Pages\EditLoan;
use App\Filament\Resources\Loans\Pages\ListLoans;
use App\Filament\Resources\Loans\Pages\CreateLoan;
use App\Filament\Resources\Loans\Schemas\LoanForm;
use App\Filament\Resources\Loans\Tables\LoansTable;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LoanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                TextColumn::make('borrower.name')->label('Peminjam (Borrower)'),
                TextColumn::make('jumlah'),
                TextColumn::make('tenor'),
                TextColumn::make('tujuan'),
                TextColumn::make('status')->badge()
                    ->colors([
                        'warning' => 'Menunggu Persetujuan',
                        'success' => 'Disetujui',
                        'danger'  => 'Ditolak',
                    ]),
            ])->recordActions([
                Action::make('Disetujui')
                    ->label('Disetujui')
                    ->color('success')
                    ->icon(Heroicon::CheckBadge)
                    ->requiresConfirmation()
                    ->action(function (Loan $record){
                        $record->update(['status'=>'Disetujui']);
                        Notification::make()
                        ->title('Pengajuan Disetujui')
                        ->success()
                        ->send();
                    }),

                Action::make('Ditolak')
                    ->label('Ditolak')
                    ->color('danger')
                    ->icon(Heroicon::XCircle)
                    ->requiresConfirmation()
                    ->action(function (Loan $record){
                        $record->update(['status' => 'Ditolak']);
                        Notification::make()
                        ->title('Pengajuan Ditolak')
                        ->danger()
                        ->send();
                    })
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
            'index' => ListLoans::route('/'),
            'create' => CreateLoan::route('/create'),
            'edit' => EditLoan::route('/{record}/edit'),
        ];
    }
}
