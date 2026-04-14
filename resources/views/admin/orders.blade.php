@extends('admin.layout')

@section('title', 'Админка: Заказы')

@section('content')
    <h1>Заказы</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Клиент</th>
                <th>Контакты</th>
                <th>Тип/Оплата</th>
                <th>Сумма</th>
                <th>Позиции</th>
                <th>Статус</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}<div class="muted">{{ $order->created_at }}</div></td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->phone }}<div class="muted">{{ $order->address ?: '—' }}</div></td>
                    <td>{{ $order->delivery_type }} / {{ $order->payment_method }}</td>
                    <td>{{ $order->total }} ₽</td>
                    <td>
                        @foreach($order->items as $item)
                            <div>{{ $item->menuItem->title ?? 'Удалено' }} x{{ $item->qty }}</div>
                        @endforeach
                    </td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form class="row" method="POST" action="{{ route('admin.orders.status', $order) }}">
                            @csrf
                            @method('PATCH')
                            <select name="status">
                                @foreach(['new', 'accepted', 'completed', 'cancelled'] as $status)
                                    <option value="{{ $status }}" @selected($order->status === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Сохранить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Заказов пока нет.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $orders->links() }}</div>
@endsection

