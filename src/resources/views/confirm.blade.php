  @extends('layouts.app')

  @section('css')'
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
  @endsection

  @section('content')
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>お問い合わせ内容確認</h2>
      </div>
      <form action="/contacts/thanks" method="POST">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <input type="text" name="name" value="{{ $form['name'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $form['email'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <input type="tel" name="tel" value="{{ $form['tel'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">カテゴリー</th>
              <td class="confirm-table__text">
                <input type="text" value="{{ $category->content }}" readonly />
                <input type="hidden" name="category_id" value="{{ $form['category_id'] }}" />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">タグ</th>
              <td class="confirm-table__text">
              @foreach ($tags as $tag)
              {{ $tag->name }}@if (!$loop->last), @endif
              @endforeach
              @foreach ($form['tag_ids'] as $tag_id)
                <input type="hidden" name="tag_ids[]" value="{{ $tag_id }}">
              @endforeach
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <input type="text" name="content" value="{{ $form['content'] }}" readonly />
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
  @endsection
