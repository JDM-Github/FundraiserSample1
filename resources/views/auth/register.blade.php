@extends('layout')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; font-size: 24px; color: #d9534f; margin-bottom: 20px;">Register</h1>
        
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="font-size: 14px; color: #333;">Full Name</label>
                <input type="text" name="name" required placeholder="Enter your full name" 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="email" style="font-size: 14px; color: #333;">Email Address</label>
                <input type="email" name="email" required placeholder="Enter your email" 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="password" style="font-size: 14px; color: #333;">Password</label>
                <input type="password" name="password" required placeholder="Create a password" 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label for="password_confirmation" style="font-size: 14px; color: #333;">Confirm Password</label>
                <input type="password" name="password_confirmation" required placeholder="Confirm your password" 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label for="role" style="font-size: 14px; color: #333;">Select Role</label>
                <select name="role" required 
                    style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
                    <option value="fundraiser">Fundraiser</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>

            <button type="submit" 
                style="width: 100%; padding: 12px; background-color: #d9534f; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                Register
            </button>
        </form>

        <div style="margin-top: 15px; text-align: center;">
            Already have an account? <a href="{{ route('login') }}" style="font-size: 14px; color: #d9534f;">Login here</a>
        </div>
    </div>
@endsection
