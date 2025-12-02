@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
<div class="contact-show__content">
    <div class="contact-show__heading">
        <h2>お問い合わせ詳細</h2>
    </div>
    
    <div class="contact-show__detail">
        <div class="detail-row">
            <div class="detail-label">ID</div>
            <div class="detail-value">{{ $contact->id }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">お名前</div>
            <div class="detail-value">{{ $contact->name }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">メールアドレス</div>
            <div class="detail-value">{{ $contact->email }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">電話番号</div>
            <div class="detail-value">{{ $contact->tel }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">お問い合わせ内容</div>
            <div class="detail-value content">{{ $contact->content }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">作成日時</div>
            <div class="detail-value">{{ $contact->created_at->format('Y-m-d H:i:s') }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">更新日時</div>
            <div class="detail-value">{{ $contact->updated_at->format('Y-m-d H:i:s') }}</div>
        </div>
    </div>
    
    <div class="contact-show__actions">
        <a href="/contacts" class="btn btn-back">一覧に戻る</a>
        <a href="/contacts/{{ $contact->id }}/edit" class="btn btn-edit">編集</a>
    </div>
</div>
@endsection