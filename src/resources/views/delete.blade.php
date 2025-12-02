@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/delete.css') }}">
@endsection

@section('content')
<div class="delete-confirm">
    <h2 class="delete-confirm__heading">削除確認</h2>
    <div class="delete-confirm__content">
        <p class="delete-confirm__message">以下のお問い合わせを削除しますか？</p>
        
        <div class="delete-confirm__detail">
            <div class="detail-row">
                <div class="detail-label">ID</div>
                {{-- ここにIDを表示 --}}
                <div class="detail-value">{{ $contact->id }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">お名前</div>
                {{-- ここにお名前を表示 --}}
                <div class="detail-value">{{ $contact->name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">メールアドレス</div>
                {{-- ここにメールアドレスを表示 --}}
                <div class="detail-value">{{ $contact->email }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">お問い合わせ内容</div>
                {{-- ここにお問い合わせ内容を表示 --}}
                <div class="detail-value content">{{ $contact->content }}</div>
            </div>
        </div>

        <p class="delete-confirm__warning">※この操作は取り消せません</p>

        <div class="delete-confirm__actions">
            {{-- 戻るボタン：詳細画面に戻る --}}
            <a class="btn btn-back" href="/contacts/{{ $contact->id }}">戻る</a>
            
            {{-- 削除ボタン：フォームで送信 --}}
            {{-- action属性とHTTPメソッドを設定 --}}
            <form action="/contacts/{{ $contact->id }}" method="post">
                @csrf
                {{-- DELETEメソッドを偽装 --}}
                @method('DELETE')
                <button class="btn btn-delete" type="submit">削除する</button>
            </form>
        </div>
    </div>
</div>
@endsection
