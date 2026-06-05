<?php
namespace App\Filament\Resources;

use App\Filament\Resources\RoomsResource\Pages;
use App\Models\Rooms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// SỬA CHÍNH XÁC 2 DÒNG NÀY ĐỂ FIX LỖI ẨN FORM TRÊN FILAMENT V3:
use Filament\Forms\Form; 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;

class RoomsResource extends Resource
{
    protected static ?string $model = Rooms::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // 1. HÀM ĐỊNH NGHĨA FORM TẠO/SỬA PHÒNG
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông tin phòng nghỉ')
                    ->schema([
                        TextInput::make('room_number')
                            ->label('Số phòng')
                            ->required(),

                        Select::make('type')
                            ->label('Loại phòng')
                            ->options([
                                'Căn hộ Studio áp mái' => 'Căn hộ Studio áp mái',
                                'Modern Minimalist Studio' => 'Modern Minimalist Studio',
                                'Family Grand Suite' => 'Family Grand Suite',
                            ])
                            ->required(),

                        TextInput::make('price')
                            ->label('Giá phòng')
                            ->numeric()
                            ->required(),

                        Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'available' => 'Còn trống',
                                'booked' => 'Đã đặt',
                            ])
                            ->default('available')
                            ->required(),

                        Textarea::make('description')
                            ->label('Mô tả')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room_number')->label('Số phòng')->searchable(),
                Tables\Columns\TextColumn::make('type')->label('Loại phòng'),
                Tables\Columns\TextColumn::make('price')->label('Giá phòng')->money('VND'),
                Tables\Columns\TextColumn::make('status')->label('Trạng thái'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(), // Thêm nút Sửa ở trang danh sách
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    // 3. HÀM ĐIỀU HƯỚNG CÁC TRANG CON
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRooms::route('/create'),
            'edit' => Pages\EditRooms::route('/{record}/edit'),
        ];
    }
} // <--- DẤU NGOẶC QUYẾT ĐỊNH ĐỂ ĐÓNG CLASS ROOMSRESOURCE