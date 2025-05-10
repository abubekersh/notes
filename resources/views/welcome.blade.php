<x-layouts.app>
    <x-slot:title>Notes Home</x-slot:title>
    <section class="  p-4">
        <h2 class=" text-center text-orange-500 capitalize text-2xl font-bold">What you can do here</h2>
        <div class="mb-10 grid grid-cols-1 md:grid-cols-2 gap-x-30 px-1 md:px-20 gap-y-10 mt-10">
            <div class="group border border-orange-500 bg-orange-500/10 hover:bg-white transition-colors duration-700 rounded  text-orange-500 py-4 px-10 min-h-40">
                <h3 class="text-center font-bold mb-3 text-sm md:text-lg ">Create Notes</h3>
                <p class="md:text-sm text-xs">Create Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente quos deleniti sit molestiae in dolorum, nihil reiciendis obcaecati modi, voluptatum incidunt? Molestiae, non illo. Hic.</p>
                <a href="/notes/create" class="text-right text-sm mt-8 inline-block "><span class="group-hover:underline">Create Note</span><span class="ml-1 group-hover:ml-2 transition-all duration-700">&rightarrow;</span></a>
            </div>
            <div class="border border-orange-500 group bg-orange-500/10 hover:bg-white transition-colors duration-700 rounded  text-orange-500 py-4 px-10 min-h-40">
                <h3 class="text-center font-bold mb-3 text-sm md:text-lg">Group Notes By Tag</h3>
                <p class="md:text-sm text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aspernatur dolores quidem excepturi eaque error totam?</p>
                <a href="/notes" class="text-right text-sm mt-8 inline-block "><span class="group-hover:underline">Filter Notes</span><span class="ml-1 group-hover:ml-2 transition-all duration-700">&rightarrow;</span></a>
            </div>
            <div class="border group border-orange-500 bg-orange-500/10 hover:bg-white transition-colors duration-700 rounded  text-orange-500 py-4 px-10 min-h-40">
                <h3 class="text-center font-bold mb-3 text-sm md:text-lg">Edit and update previous Notes</h3>
                <p class="md:text-sm text-xs">you need Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate molestiae tempora consequatur tempore magnam consequuntur amet provident magni eum sequi.</p>
                <a href="/notes" class="text-right text-sm mt-8 inline-block "><span class="group-hover:underline">Edit your Notes</span><span class="ml-1 group-hover:ml-2 transition-all duration-700">&rightarrow;</span></a>
            </div>
            <div class="border group border-orange-500 bg-orange-500/10 hover:bg-white transition-colors duration-700 rounded  text-orange-500 py-4 px-10 min-h-40">
                <h3 class="text-center font-bold mb-3 text-sm md:text-lg">Have your secure account for storing your notes</h3>
                <p class="md:text-sm text-xs">different Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus eius ipsa, recusandae quia illum eos!</p>
                <a href="/register" class="text-right text-sm mt-8 inline-block "><span class="group-hover:underline">Register</span><span class="ml-1 group-hover:ml-2 transition-all duration-700">&rightarrow;</span></a>
            </div>
        </div>
    </section>
</x-layouts.app>