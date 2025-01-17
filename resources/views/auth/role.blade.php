<x-layout title="Role users">
    <style>
        .center th {
            text-align: center;
        }

        
    </style>

<form action="{{ route('auth.search') }}" method="get" class="search-player" autocomplete="off">
    <input type="text" id="search" name="search" placeholder="Search for a user:" />
    <div id="suggestions" style="border: 1px solid #ccc; display: none; position: absolute; background: white; width: 200px;"></div>
    <button type="submit">Search</button>
</form>

<br><br>


    
    <h1 style='text-align: center'>Users with Their Roles</h1>
    <p>1 = Normal User <br> 2 = Admin</p>


    @if(isset($message))
        <p style="text-align: center; color: red;">
            {{ $message }}
        </p>
        @else


    
    <table class="center">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Confirmation</th>
        </tr>
        
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('updateRole', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="role_id" value="{{ $user->role_id }}" required>
            </td>
            <td>
                    <button type="submit" class="confirmationbutton" onclick="return confirm('Confirm your role update!')">Confirm</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 @endif


 <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const suggestionsBox = document.getElementById('suggestions');

    searchInput.addEventListener('keyup', function () {
        let query = this.value;

        if (query.length > 1) {
            fetch(`/auth/search-suggestions?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    suggestionsBox.innerHTML = '';
                    
                    if (data.length > 0) {
                        suggestionsBox.style.display = 'block';
                        data.forEach(function (user) {
                            let item = document.createElement('div');
                            item.style.padding = '5px';
                            item.style.cursor = 'pointer';
                            item.textContent = user;

                            // On click, fill input with the selected name
                            item.onclick = function () {
                                searchInput.value = user;
                                suggestionsBox.style.display = 'none';
                            };

                            suggestionsBox.appendChild(item);
                        });
                    } else {
                        suggestionsBox.style.display = 'none';
                    }
                });
        } else {
            suggestionsBox.style.display = 'none';
        }
    });

    // Hide suggestions when clicking outside
    document.addEventListener('click', function (e) {
        if (!suggestionsBox.contains(e.target) && e.target !== searchInput) {
            suggestionsBox.style.display = 'none';
        }
    });
});
</script>


</x-layout>
