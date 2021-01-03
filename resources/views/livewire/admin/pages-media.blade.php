<div>


    <form method="POST" wire:submit.prevent="submit">

        <x-media-library-collection
            name="albums"
            :model="$page"
            collection="album"
        />

        <button type="submit">Submit</button>
    </form>
</div>
