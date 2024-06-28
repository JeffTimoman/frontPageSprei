<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid row col-md-12" style="width: 100vw; height: 100vh;">
        <div class="col-md-12" style="width: 100vw;">
            <div class="col-md-12 d-flex align-items-center justify-content-center" style="width: 100vw;">
                <form action="" method="POST">
                    @csrf
                    @php
                        $canLogin = \App\Models\WebVariable::where('name', 'AllowLogin')->first();
                        $timeLimit = \App\Models\WebVariable::where('name', 'BlockClaimTime')->first();
                    @endphp
                    <div class="col-md-12" style="width: 100%;">
                        <label for="AllowLogin" class="form-label">Allow Login?</label>
                        <select class="form-select" name="AllowLogin" id="AllowLogin">
                            <option value="1" {{ $canLogin->value == 1 ? 'selected' : '' }}>Allow</option>
                            <option value="0" {{ $canLogin->value == 0 ? 'selected' : '' }}>Block</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="BlockClaimTime" class="form-label">Block Claim In : </label>
                        <input type="datetime-global" class="form-control" name="BlockClaimTime" id="BlockClaimTime"
                            value="{{ $timeLimit->value }}">

                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary" style="width: 100%">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
