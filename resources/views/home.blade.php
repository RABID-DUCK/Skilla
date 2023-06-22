<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="window">
            <button onclick="getData()">Вывести данные</button>
            <div>
                    <b>Фильтры:</b>
                    <div class="data-filter">
                        <div class="date">
                            <label>Дата от:</label>
                            <input type="date" placeholder="22.06.2023" name="date_start" id="date_start">
                            <label>Дата до:</label>
                            <input type="date" placeholder="22.06.2023" name="date_end" id="date_end">
                        </div>
                        <div class="categories">
                            <label>Категория:</label>
                            <select name="category" id="category">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <button class="filter-btn" onclick="filter()">Фильтр</button>
            </div>
        </div>

        <div class="window table hide" id="table">
            <table>
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Категория</th>
                        <th>Дата создания</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <script src="{{asset('build/assets/main.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>
    </body>
</html>
