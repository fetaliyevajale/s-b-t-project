@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Səbət</h1>
    @if($basket && $basket->basketProducts->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Məhsul</th>
                    <th>Miqdar</th>
                    <th>Qiymət</th>
                    <th>Toplam</th>
                    <th>Sil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($basket->basketProducts as $basketProduct)
                    <tr>
                        <td>{{ $basketProduct->product->name }}</td>
                        <td>{{ $basketProduct->quantity }}</td>
                        <td>{{ $basketProduct->product->price }}</td>
                        <td>{{ $basketProduct->quantity * $basketProduct->product->price }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $basketProduct->product_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Ümumi: {{ $basket->basketProducts->sum(function($bp) { return $bp->quantity * $bp->product->price; }) }}</h4>
    @else
        <p>Səbətinizdə heç bir məhsul yoxdur.</p>
    @endif
</div>
@endsection
