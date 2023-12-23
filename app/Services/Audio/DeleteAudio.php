<?php

namespace App\Services\Audio;

use App\Models\Audio;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DeleteAudio extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:audio,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $audio = Audio::findOrFail($data['id']);
        $audio->delete();

        Storage::disk('public')->delete('audios/' . $audio['filename']);

        return true;
    }
}
