@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit-form">
    <h2 class="edit-form__heading">お問い合わせ修正</h2>
    <form class="edit-form__form" action="/contacts/{{ $contact->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="edit-form__group">
            <label class="edit-form__label">
                お名前
                <span class="edit-form__required">必須</span>
            </label>
            <input class="edit-form__input" type="text" name="name" value="{{ old('name', $contact->name) }}">
            @error('name')
            <p class="edit-form__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="edit-form__group">
            <label class="edit-form__label">
                メールアドレス
                <span class="edit-form__required">必須</span>
            </label>
            <input class="edit-form__input" type="email" name="email" value="{{ old('email', $contact->email) }}">
            @error('email')
            <p class="edit-form__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="edit-form__group">
            <label class="edit-form__label">
                電話番号
                <span class="edit-form__required">必須</span>
            </label>
            <input class="edit-form__input" type="tel" name="tel" value="{{ old('tel', $contact->tel) }}">
            @error('tel')
            <p class="edit-form__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="edit-form__group">
            <label class="edit-form__label">
                お問い合わせ内容
                <span class="edit-form__required">必須</span>
            </label>
            <textarea class="edit-form__textarea" name="content">{{ old('content', $contact->content) }}</textarea>
            @error('content')
            <p class="edit-form__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="edit-form__actions">
            <a class="edit-form__back-btn" href="/contacts/{{ $contact->id }}">戻る</a>
            <button class="edit-form__submit-btn" type="submit">更新</button>
        </div>
    </form>
</div>
@endsection
