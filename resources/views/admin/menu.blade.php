@extends('admin.layout')

@section('title', 'Админка: Меню')

@section('content')
    <h1>Меню</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Категория</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Вес</th>
                <th>Доступность</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menuItems as $item)
                <tr>
                    <td>#{{ $item->id }}</td>
                    <td>{{ $item->category->title ?? '—' }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->price }} ₽</td>
                    <td>{{ $item->weight ?: '—' }}</td>
                    <td>{{ $item->is_available ? 'Показано' : 'Скрыто' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.menu.toggle', $item) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit">{{ $item->is_available ? 'Скрыть' : 'Показать' }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Блюд пока нет.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $menuItems->links() }}</div>
@endsection

