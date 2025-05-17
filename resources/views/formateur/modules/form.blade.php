<div class="mb-4">
    <label for="title" class="block font-semibold">Titre du module</label>
    <input type="text" name="title" id="title" class="w-full border p-2 rounded" value="{{ old('title', $module->title ?? '') }}" required>
</div>

<button type="submit" class="btn btn-success">Enregistrer</button>
