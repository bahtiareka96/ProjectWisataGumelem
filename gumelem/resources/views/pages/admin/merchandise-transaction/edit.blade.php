@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between my-2">
        <h1 class="h3 mb-0 text-gray-800">Edit Status Transaksi {{ $item->title }}</h1>
      </div>
</div>

    @if ($errors->any())
        <div class="alert alert-anger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <div class="card shadow m-5">
        <div class="card-body">
            <form action="{{ route('merchandise-transaction.update', $item->id) }}" method="POST">
                @method('PUT')
             @csrf
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" required class="form-control">
                        <option value="{{ $item->status }}">
                        ({{ $item->status }})
                        </option>
                        <option value="PENDING">PENDING</option>
                        <option value="SHIPPING">SHIPPING</option>
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="CANCEL">CANCEL</option>
                        <option value="FAILED">FAILED</option>
                    </select>
                </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">
                Ubah
            </button>
            </form>
        </div>
    </div>




@endsection
