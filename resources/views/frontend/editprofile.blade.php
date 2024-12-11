<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 30px;
            background-color: white;
        }

        .card-header {
            background-color: #6c63ff;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 15px;
        }

        

        .form-control {
            border-radius: 8px;
            padding: 15px;
            font-size: 1rem;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        .btn-custom {
            background-color: #6c63ff;
            color: white;
            padding: 12px 20px;
            width: auto; /* Adjust width to auto */
            max-width: 250px; /* Set a maximum width */
            border-radius: 8px;
            font-size: 1.1rem;
            border: none;
            transition: background-color 0.3s ease;
        }


        .btn-custom:hover {
            background-color: #5a4bdb;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .upload-btn {
            background-color: #28a745;
            color: white;
            padding: 8px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            max-width: 300px; /* Adjust width to make it shorter */
            text-align: center;
        }

        .upload-btn:hover {
            background-color: #218838;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        
        .row .col-md-6 {
            padding-right: 15px;
            padding-left: 15px;
        }

        
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture -->
                        <div class="form-group">
                            <img class="profile-img" src="{{ asset('storage/profile_pictures/' . $user->foto) }}" alt="Profile Picture">
                            <div>
                                <input type="file" name="foto" class="upload-btn">
                            </div>
                        </div>

                        <!-- Full Name and Email (2 columns) -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_customer">Full Name</label>
                                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ $user->nama_customer }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_customer">Email</label>
                                    <input type="email" class="form-control" id="email_customer" name="email_customer" value="{{ $user->email_customer }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Phone and Password (2 columns) -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp">Phone Number</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password (Single column) -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn-custom btn-sm" style="padding: 8px 16px; font-size: 0.9rem;">Save Changes</button>
                            <a href="{{ route('profile') }}" class="btn btn-secondary btn-sm" style="width: 100px; padding: 8px 16px; font-size: 0.9rem;">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
