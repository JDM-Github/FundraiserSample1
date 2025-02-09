@extends('layout')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 10px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; font-size: 24px; color: #d9534f; margin-bottom: 20px;">Login</h1>
        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label for="email" style="font-size: 14px; color: #333;">Email Address</label>
                <input type="email" name="email" required placeholder="Enter your email" 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 25px;">
                <label for="password" style="font-size: 14px; color: #333;">Password</label>
                <input type="password" name="password" required placeholder="Enter your password" 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <button type="submit" 
                style="width: 100%; padding: 12px; background-color: #d9534f; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                Login
            </button>
        </form>

        <div style="margin-top: 15px; text-align: center;">
            Don't have an account? <a href="{{ route('register') }}" style="font-size: 14px; color: #d9534f;">Register here</a>
        </div>
    </div>
@endsection
@include('footer')