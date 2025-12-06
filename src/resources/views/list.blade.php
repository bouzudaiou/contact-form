@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}" />
@endsection

@section('content')
<div class="contact-list__content">
    <div class="contact-list__heading">
        <h2>お問い合わせ一覧</h2>
    </div>
    <table class="contact-list__table">
        <thead>
            <tr>
                <th>ID</th>
                <th>お名前</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>お問い合わせ内容</th>
                <th>カテゴリー</th>
                <th>タグ</th>
                <th>作成日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr onclick="location.href='/contacts/{{ $contact->id }}'">
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->tel }}</td>
                <td>{{ Str::limit($contact->content, 30) }}</td>
                <td>{{ $contact->category ? $contact->category->content : '未設定' }}</td>
                <td>
                    @foreach ($contact->tags as $tag)
                    {{ $tag->name }}@if (!$loop->last), @endif
                    @endforeach
                </td>
                <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $contacts->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection