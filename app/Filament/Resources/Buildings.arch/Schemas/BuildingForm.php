<?php

namespace App\Filament\Resources\Buildings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BuildingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Nama Gedung')
                    ->placeholder('Masukkan nama gedung...')
                    ->helperText('Gunakan nama yang unik agar mudah diidentifikasi.')
                    ->maxLength(100)
                    ->unique(ignoreRecord: true)
                    ->autofocus(true)
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),

                FileUpload::make('image')
                    ->label('Foto Gedung')
                    ->helperText('Unggah gambar landscape (16:9) dalam format JPG atau PNG, maksimal 2MB.')
                    ->image()
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->rules(['mimes:jpg,jpeg,png', 'max:2048'])
                    ->disk('public')
                    ->directory('buildings')
                    ->imagePreviewHeight('250')
                    ->imageEditor()
                    ->imageEditorAspectRatios(['16:9'])
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth(1920)
                    ->imageResizeTargetHeight(1080)
                    ->getUploadedFileNameForStorageUsing(
                        fn($file) => 'building-' . uniqid() . '.' . $file->getClientOriginalExtension()
                    )
                    ->columnSpanFull()
            ]);
    }
}
