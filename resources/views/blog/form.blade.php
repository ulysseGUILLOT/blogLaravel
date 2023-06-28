<form action="" method="post" class="mt-5 vstack gap-3">
    @csrf
    @method($post->id ? 'PATCH':'POST')
    <div class="form-group">
        <label class="mb-2" for="title">Titre :</label>
        <input class="form-control" id="title" type="text" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label class="mb-2" for="slug">Slug :</label>
        <input class="form-control" id="slug" type="text" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label class="mb-2" for="content">Contenu :</label>
        <textarea class="form-control" id="content" name="content"
                  style="height: 300px">{{ old('content', $post->content) }}</textarea>
        @error('content')
        {{$message}}
        @enderror
    </div>
    <div class="form-group">
        <label class="mb-2" for="category">Catégorie :</label>
        <select id="category" name="category_id" class="form-control">
            <option value="">Sélectionner un catégorie</option>
            @foreach($categories as $category)
                <option @selected(old('$category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('$category_id')
        {{$message}}
        @enderror
    </div>
    <button class="btn btn-secondary">
        @if($post->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
