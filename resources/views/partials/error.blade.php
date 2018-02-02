@if (count($errors))

    <div class="form-group">

        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <p><strong>Hint:</strong> Use the backward button of your browser to get back to your previous input</p>

        </div>

    </div>

@endif