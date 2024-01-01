@extends('layout.main')
@section('title', 'resi pembayaran')
    <style>
        .sale-nota {
            display: flex;
            padding-bottom: 3px;
            justify-content: center;
            border-radius: 3em;
        }
        .sale-nota p{
            font-family: monospace;
            font-size: 15pt;
        }
    </style>
@section('container')
    <div class="bg-primary sale-nota">
        <p class="sale-nota">
            Bukti pembayaran
        </p>
        
    </div>
@endsection