<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Reservation</h1>
    <div class="card" style="width: 18rem;">
        <div class="container mt-4">
            <form action="{{route('editReservation', $guest-> id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Nama" required value="{{ $guest->name }}"">
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" required value="{{ $guest->email }}"">
                    @error('email')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" placeholder="Nomor Telepon" required value="{{ $guest->phone }}">
                    @error('phone')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>     
                <div class="mb-3">
                    <label for="date-and-time">Date and Time :</label>
                    <input type="datetime-local" name="reservation_time" required value="{{ $guest->reservations->first()->reservation_time }}">
                    @error('reservation_time')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="seats">Seats:</label>
                    <input type="number" name="seats" placeholder="Jumlah Kursi" required value="{{ $guest->reservations->first()->seats }}">
                    @error('seats')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="reservation-image">Deposit Payment Proof :</label>
                  <input id="image_path" type="file" name="image_path"><br>
                  @error('image_path')
                        <p style="color: red;">{{ $message }}</p>
                  @enderror
              </div>
                <button type="submit" class="btn btn-primary">Update</button><br><br>
            </form>
        </div>
    </div>
  </body>
</html>