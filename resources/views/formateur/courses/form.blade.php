<div class="mb-4">
    <label for="title" class="block font-semibold">Titre</label>
    <input type="text" name="title" id="title" class="w-full border p-2 rounded" value="{{ old('title', $course->title ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="description" class="block font-semibold">Description</label>
    <textarea name="description" id="description" class="w-full border p-2 rounded">{{ old('description', $course->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Enregistrer</button>
