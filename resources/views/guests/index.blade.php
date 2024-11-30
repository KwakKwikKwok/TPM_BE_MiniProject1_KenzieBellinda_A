<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Reservation</h1>
    <div class="card" style="width: 18rem;">
        <div class="container mt-4">
            <form action="/guests" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Nama" required>
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" required>
                    @error('email')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" placeholder="Nomor Telepon" required>
                    @error('phone')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>     
                <div class="mb-3">
                    <label for="date-and-time">Date and Time :</label>
                    <input type="datetime-local" name="reservation_time" required>
                    @error('reservation_time')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="seats">Seats:</label>
                    <input type="number" name="seats" placeholder="Jumlah Kursi" required>
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
                <button type="submit" class="btn btn-primary">Reservasi</button><br><br>
            </form>
        </div>
    </div>
    <h2>Reserved List:</h2>
    <ul>
        @forelse ($guests as $guest)
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
              @foreach ($guest->reservations as $reservation)
                  <img src="{{ asset('storage/'.$reservation->image_path) }}" alt="{{ $guest->name }}" class="card-img-top">
              @endforeach
              <li class="list-group-item">Name            : {{ $guest->name }}</li>
              <li class="list-group-item">Email           : {{ $guest->email }}</li>
              <li class="list-group-item">Phone Number    : {{ $guest->phone }}</li>
              @foreach ($guest->reservations as $reservation)
                <li class="list-group-item">Date and Time   : {{ $reservation->reservation_time }}</li>
                <li class="list-group-item">Seats           : {{ $reservation->seats }} seats</li>
              @endforeach
            </ul>
        </div><br><br>
        @empty
        <div>
          Data is Empty.
        </div>
        @endforelse
    </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>