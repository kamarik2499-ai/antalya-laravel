@extends('admin.layout')

@section('title', 'Админка: Бронирования')

@section('content')
    <h1>Бронирования</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Дата/Время</th>
                <th>Гостей</th>
                <th>Комментарий</th>
                <th>Статус</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $reservation)
                <tr>
                    <td>#{{ $reservation->id }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>{{ $reservation->date?->format('Y-m-d') }} {{ $reservation->time }}</td>
                    <td>{{ $reservation->guests }}</td>
                    <td>{{ $reservation->note ?: '—' }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        <form class="row" method="POST" action="{{ route('admin.reservations.status', $reservation) }}">
                            @csrf
                            @method('PATCH')
                            <select name="status">
                                @foreach(['new', 'confirmed', 'completed', 'cancelled'] as $status)
                                    <option value="{{ $status }}" @selected($reservation->status === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Сохранить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Бронирований пока нет.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:12px;">{{ $reservations->links() }}</div>
@endsection

