@props(['method' => 'POST', 'action' => route('post.store'), 'post'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input name="title" class="field form-control" type="text" placeholder="Johnny Brown">
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="textarea_editor form-control border-radius-0" placeholder="Enter text ..."></textarea>
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
       <input name="thumbnail" type="file" class="form-control-file form-control height-auto">
    </div>
    <button type="submit" class="action btn btn-primary btn-lg">
        Publish
    </button>
</form>
