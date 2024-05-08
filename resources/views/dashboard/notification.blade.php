@extends('layouts.dashboard')
@section('content')
    <div class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Individual column searching</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('notify') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn-success">Send Message</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
