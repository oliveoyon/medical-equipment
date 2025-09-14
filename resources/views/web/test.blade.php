<nav>
    <ul>
        @foreach($headerCategories as $cat)
            <li>
                {{ $cat->name }}
                @if($cat->subcategories->count())
                    <ul>
                        @foreach($cat->subcategories as $sub)
                            <li>{{ $sub->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
