<nav class="flex items-center justify-content-between p-6 bg-white shadow">
    <div>
        <a class="btn-navbar inline-block text-sm font-medium text-gray-700 bg-transparent border border-transparent rounded hover:bg-gray-200 transition duration-200" href="{{ url('quotes-create') }}">
            Create Quote
        </a>
        <a class="btn-navbar inline-block text-sm font-medium text-gray-700 bg-transparent border border-transparent rounded hover:bg-gray-200 transition duration-200" href="{{ url('quotes-view') }}">
            View Quotes
        </a>
    </div>
    <div class="text-center">
        <span class="text-2xl font-semibold text-gray-700">Quote Generation</span>
    </div>
    <div>
        <a href="{{ url('logout') }}" class="btn-navbar inline-block text-sm font-medium text-gray-700 bg-transparent border border-transparent rounded hover:bg-gray-200 transition duration-200">
            Logout
        </a>
    </div>
</nav>
