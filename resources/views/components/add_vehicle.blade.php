<div class="max-w-3xl mx-auto p-8 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Form Input Kendaraan</h2>

    <form>
        <!-- Upload Gambar -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="gambar">Upload Gambar</label>
            <input type="file" id="gambar" class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Nomor Registrasi -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="nomorRegistrasi">Nomor Registrasi</label>
            <input type="text" id="nomorRegistrasi" placeholder="Masukkan Nomor Registrasi" 
                   class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Tipe Kendaraan -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="tipeKendaraan">Tipe Kendaraan</label>
            <input type="text" id="tipeKendaraan" placeholder="Masukkan Tipe Kendaraan" 
                   class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Fuel -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="fuel">Fuel</label>
            <input type="text" id="fuel" placeholder="Masukkan Jenis Fuel" 
                   class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Silinder -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="silinder">Silinder</label>
            <input type="text" id="silinder" placeholder="Masukkan Kapasitas Silinder" 
                   class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Tipe Transmisi -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="tipeTransmisi">Tipe Transmisi</label>
            <select id="tipeTransmisi" class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
                <option>Pilih Tipe Transmisi</option>
                <option>Manual</option>
                <option>Otomatis</option>
            </select>
        </div>

        <!-- Last Oil Change -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="lastOilChange">Last Oil Change</label>
            <input type="date" id="lastOilChange" 
                   class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Last Service -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="lastService">Last Service</label>
            <input type="date" id="lastService" 
                   class="block w-full text-gray-700 border border-gray-300 rounded-md p-2">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-4 bg-blue-500">
            <button type="submit" class=" hover:bg-blue-700 font-semibold py-3 px-6 rounded-lg shadow-lg">
                Submit
            </button>
        </div>
    </form>
</div>
