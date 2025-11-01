<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        .topbar {
            background-color: #03460e;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        i {
            font-size: 15px;
        }

        .topbar h4 {
            margin: 0;
            font-weight: 600;
        }

        .nav-pills .nav-link {
            border-radius: 10px;
            margin: 5px 0;
            color: #03460e;
            background-color: #fff;
            border: 1px solid #dee2e6;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-pills .nav-link.active {
            background-color: #03460e;
            color: #fff;
            box-shadow: 0 2px 8px rgba(13, 110, 253, 0.4);
        }

        .tab-content {
            background-color: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .d-flex.align-items-start {
                flex-direction: column;
            }

            .nav.flex-column {
                flex-direction: row !important;
                overflow-x: auto;
                width: 100%;
                justify-content: space-between;
                padding-bottom: 10px;
            }

            .nav-link {
                flex: 1;
                text-align: center;
            }
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link,
        .btn-primary {
            background-color: #03460e !important;
        }
    </style>
</head>

<body>

    <div class="topbar">
        <h4>📘 Admin Dashboard</h4>
        <button class="btn btn-light btn-sm">Logout</button>
    </div>

    <div class="container-fluid mt-4">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-category-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-category" type="button" role="tab" aria-controls="v-pills-category"
                    aria-selected="true">📂 Category</button>

                <button class="nav-link" id="v-pills-language-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-language" type="button" role="tab" aria-controls="v-pills-language"
                    aria-selected="false">🈸 Language</button>

                <button class="nav-link" id="v-pills-books-tab" data-bs-toggle="pill" data-bs-target="#v-pills-books"
                    type="button" role="tab" aria-controls="v-pills-books" aria-selected="false">📚 Books</button>
            </div>

            <div class="tab-content w-100" id="v-pills-tabContent">
                <!-- Category Tab -->
                <div class="tab-pane fade show active" id="v-pills-category" role="tabpanel"
                    aria-labelledby="v-pills-category-tab" tabindex="0">

                    @include('dashboard.cat_tab')

                

                </div>

                <!-- Language Tab -->
                <div class="tab-pane fade" id="v-pills-language" role="tabpanel" aria-labelledby="v-pills-language-tab"
                    tabindex="0">
                    @include('dashboard.language')
                </div>

                <!-- Books Tab -->
                <div class="tab-pane fade" id="v-pills-books" role="tabpanel" aria-labelledby="v-pills-books-tab"
                    tabindex="0">
                    @include('dashboard.books')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
