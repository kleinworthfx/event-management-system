<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequestABC extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->isOrganizer() || auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:10|max:5000',
            'event_date' => 'required|date|after:tomorrow',
            'location' => 'required|string|max:255',
            'max_attendees' => 'required|integer|min:1|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'An event title is required.',
            'title.min' => 'The title must be at least 3 characters.',
            'description.min' => 'Please provide a longer description (minimum 10 characters).',
            'event_date.after' => 'The event date must be at least tomorrow.',
            'max_attendees.max' => 'Maximum attendees cannot exceed 1000.',
        ];
    }
}