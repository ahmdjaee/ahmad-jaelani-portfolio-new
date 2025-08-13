<div class="card">
  <div class="card-body">
    <div class="d-flex flex-row justify-content-between">
      <h4 class="card-title">Project</h4>
      <div class="card-actions">
        <a
          class="nav-link btn btn-success create-new-button"
          href="{{ route('admin.project.create') }}"
          aria-expanded="false"
          wire:navigate
        >+ Create New Project</a>
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
            <th> Thumbnail</th>
            <th> Project Name </th>
            <th> Category </th>
            <th> The Best </th>
            <th> Updated At </th>
            <th class="text-right"> Action </th>

          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $project)
            <tr>
              {{-- <td>
                <div class="form-check form-check-muted m-0">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <i class="input-helper"></i></label>
                </div>
              </td> --}}
              <td>
                <img
                  src="{{ asset($project->thumbnail) }}"
                  alt="image"
                  style="width:50px; height:50px;"
                >
              </td>
              <td> {{ $project->name }} </td>
              <td> {{ $project->category }}</td>

              <td>
                @if ($project->is_best)
                  <button class="btn btn-inverse-success" type="button">Yes</button>
                @else
                  <button class="btn btn-inverse-danger" type="button">No</button>
                @endif
              </td>
              <td>
                {{ $project->updated_at->diffForHumans() }}
              </td>
              <td class="text-right">
                <a
                  class="btn text-warning btn-icon-text"
                  type="button"
                  href="{{ route('admin.project.edit', $project->id) }}"
                  wire:navigate
                > Edit
                  <i class="mdi mdi-pen btn-icon-append"></i>
                </a>
                <button
                  class="btn text-danger btn-icon-text delete-item"
                  type="button"
                  wire:click="delete({{ $project->id }})"
                  wire:confirm="Are you sure you want to delete this project?"
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
