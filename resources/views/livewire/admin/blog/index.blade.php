<div class="card">
  <div class="card-body">
    <div class="d-flex flex-row justify-content-between">
      <h4 class="card-title">Blogs</h4>
      <div class="card-actions">
        <a
          class="nav-link btn btn-success create-new-button"
          href="{{ route('admin.blogs.create') }}"
          aria-expanded="false"
        >+ Create New Blog</a>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            {{-- <th>
              <div class="form-check form-check-muted m-0">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox">
                  <i class="input-helper"></i></label>
              </div>
            </th> --}}
            <th> Title</th>
            <th> Published</th>
            <th> Published At </th>
            <th class="text-right"> Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $blog)
            <tr>
              {{-- <td>
                <div class="form-check form-check-muted m-0">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <i class="input-helper"></i></label>
                </div>
              </td> --}}
              <td> {{ $blog->title }} </td>

              <td>
                @if ($blog->published)
                  <button class="btn btn-inverse-success" type="button">Yes</button>
                @else
                  <button class="btn btn-inverse-danger" type="button">No</button>
                @endif
              </td>
              <td>
                {{ $blog->getFormattedPublishedAt() }}
              </td>
              <td class="text-right">
                <a
                  class="btn text-warning btn-icon-text"
                  type="button"
                  href="{{ route('admin.blogs.edit', ['id' => $blog->id]) }}"
                > Edit
                  <i class="mdi mdi-pen btn-icon-append"></i>
                </a>
                <button
                  class="btn text-danger btn-icon-text delete-item"
                  type="button"
                  wire:click="delete({{ $blog->id }})"
                  wire:confirm="Are you sure you want to delete this blog?"
                > Delete
                  <i class="mdi mdi-trash-can-outline btn-icon-append"></i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
