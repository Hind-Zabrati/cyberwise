<div class="mb-4">
    <label for="title" class="block font-semibold">Titre de la leçon</label>
    <input type="text" name="title" id="title" class="w-full border p-2 rounded"
           value="{{ old('title', $lesson->title ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="type" class="block font-semibold">Type de contenu</label>
    <select name="type" id="type" class="w-full border p-2 rounded" onchange="toggleFields()" required>
        <option value="">-- Choisir --</option>
        <option value="text" {{ old('type', $lesson->type ?? '') == 'text' ? 'selected' : '' }}>Texte</option>
        <option value="video" {{ old('type', $lesson->type ?? '') == 'video' ? 'selected' : '' }}>Vidéo</option>
        <option value="pdf" {{ old('type', $lesson->type ?? '') == 'pdf' ? 'selected' : '' }}>PDF</option>
    </select>
</div>

<div class="mb-4" id="textField" style="display: none;">
    <label for="content" class="block font-semibold">Contenu texte</label>
    <textarea name="content" id="content" rows="5" class="w-full border p-2 rounded">{{ old('content', $lesson->type == 'text' ? $lesson->content ?? '' : '') }}</textarea>
</div>

<div class="mb-4" id="fileField" style="display: none;">
    <label for="file" class="block font-semibold">Fichier (vidéo ou PDF)</label>
    <input type="file" name="file" id="file" class="w-full border p-2 rounded">
    
    @if(isset($lesson) && $lesson->type !== 'text')
        <p class="text-sm mt-2">
            Fichier actuel :
            <a href="{{ asset('storage/' . $lesson->content) }}" target="_blank" class="text-blue-600 underline">
                Voir
            </a>
        </p>
    @endif
</div>

<button type="submit" class="btn btn-success">Enregistrer</button>

<script>
    function toggleFields() {
        const type = document.getElementById('type').value;
        document.getElementById('textField').style.display = type === 'text' ? 'block' : 'none';
        document.getElementById('fileField').style.display = (type === 'video' || type === 'pdf') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', toggleFields);
</script>
