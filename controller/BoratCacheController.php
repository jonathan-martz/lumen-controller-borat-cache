<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\DB;
use function base_path;

class BoratCacheController extends Controller
{
    public function clearCache(array $package)
    {
        $filename = base_path() . '/public/cache/' . str_replace('/', '-', $package['fullname'] . '.json');
        if(file_exists($filename)) {
            $command = 'rm ' . $filename;
            $result = exec($command);

            if(empty($result)) {
                $this->addMessage('success', 'Cache File cleaned');
            }
            else {
                $this->addMessage('error', 'File not deleted.');
            }
        }
        else {
            $this->addMessage('error', 'Cache File doesnt exists.');
        }

        $foldername = base_path() . '/public/' . $package['type'] . '/dists/' . $package['fullname'];
        if(file_exists($foldername) && is_dir($foldername)) {
            $command = 'rm -rf ' . $foldername;
            $result = exec($command);

            if(empty($result)) {
                $this->addMessage('success', 'Cache Dists Folder cleaned');
            }
            else {
                $this->addMessage('error', 'Dists Folder not deleted.');
            }
        }
        else {
            $this->addMessage('error', 'Cache Dists Folder doesnt exists.');
        }

        $foldername = base_path() . '/public/' . $package['type'] . '/repo/' . $package['fullname'];
        if(file_exists($foldername) && is_dir($foldername)) {
            $command = 'rm -rf ' . $foldername;
            $result = exec($command);

            if(empty($result)) {
                $this->addMessage('success', 'Cache Repo Folder cleaned');
            }
            else {
                $this->addMessage('error', 'Repo Folder not deleted.');
            }
        }
        else {
            $this->addMessage('error', 'Cache Repo Folder doesnt exists.');
        }
    }


    public function clear()
    {
        $validation = $this->validate($this->request, [
            'id' => 'required|integer'
        ]);

        $packages = DB::table('packages')
            ->where('id', '=', $this->request->input('id'));

        if($packages->count() === 1) {
            $package = $packages->first();

            $this->clearCache((array)$package);
        }
        else {
            $this->addMessage('errr', 'Package not found.');
        }


        return $this->getResponse();
    }
}
