<?php

use Illuminate\Database\Seeder;
use App\Career;

class CareersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('careers')->delete();

		$carreras = [
			[
				'name'=>'INGENIERIA AGRONOMICA PRODUCCION ANIMAL',
				'code'=>'101',
				'area'=>'INGENIERIA AGRONOMICA',
			],
			[
				'name'=>'INGENIERIA AGRONOMICA PRODUCCION VEGETAL',
				'code'=>'102',
				'area'=>'INGENIERIA AGRONOMICA',
			],
			[
				'name'=>'MEDICINA VETERINARIA',
				'code'=>'103',
				'area'=>'CIENCIAS DE LA SALUD',
			],
			[
				'name'=>'LICENCIATURA PROFECIONALIZACION DE ENFERMERIA',
				'code'=>'221',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'TSU ENFERMERIA',
				'code'=>'203',
				'area'=>'CIENCIAS DE LA SALUD',
			],
			[
				'name'=>'LICENCIATURA ENFERMERIA',
				'code'=>'204',
				'area'=>'CIENCIAS DE LA SALUD',
			],
			[
				'name'=>'MEDICINA',
				'code'=>'205',
				'area'=>'CIENCIAS DE LA SALUD',
			],
			[
				'name'=>'ODONTOLOGIA',
				'code'=>'301',
				'area'=>'CIENCIAS ODONTOLOGICAS',
			],
			[
				'name'=>'TSU FISIOTERAPIA',
				'code'=>'210',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'TSU TERAPIA OCUPACIONAL',
				'code'=>'211',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'LICENCIATURA TERAPIA OCUPACIONAL',
				'code'=>'212',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'TSU OPTOMETRIA',
				'code'=>'244',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'LICENCIATURA OPTOMETRIA',
				'code'=>'244',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'TSU NUTRICION Y DIETETICA',
				'code'=>'243',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'LICENCIATURA NUTRICION Y DIETETICA',
				'code'=>'243',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'TSU HISTOCITOTECNOLOGIA',
				'code'=>'245',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'LICENCIATURA HISTOCITOTECNOLOGIA',
				'code'=>'245',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'LICENCIATURA EN HISTORIA',
				'code'=>'403',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'LICENCIATURA EN HISTORIA (calabozo)',
				'code'=>'403',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'EDUCACIÓN MENSIÓN COMPUTACIÓN',
				'code'=>'402',
				'area'=>'EDUCACION CONTINUA',
			],
			[
				'name'=>'INGENIERIA EN INFORMATICA',
				'code'=>'601',
				'area'=>'INGENIERIA DE SISTEMAS',
			],
			[
				'name'=>'INGENIERIA CIVIL',
				'code'=>'602',
				'area'=>'INGENIERIA, ARQUITECTURA Y TECNOLOGIA',
			],
			[
				'name'=>'TSU HIDROCARBUROS MENCION GAS',
				'code'=>'603',
				'area'=>'INGENIERIA, ARQUITECTURA Y TECNOLOGIA',
			],
			[
				'name'=>'TSU HIDROCARBUROS MENCION PETROLEO',
				'code'=>'604',
				'area'=>'INGENIERIA, ARQUITECTURA Y TECNOLOGIA',
			],
			[
				'name'=>'INGENIERIA EN HIDROCARBUROS MENCION PETROLEO',
				'code'=>'607',
				'area'=>'INGENIERIA, ARQUITECTURA Y TECNOLOGIA',
			],
			[
				'name'=>'INGENIERIA EN HIDROCARBUROS MENCION GAS',
				'code'=>'608',
				'area'=>'INGENIERIA, ARQUITECTURA Y TECNOLOGIA',
			],
			[
				'name'=>'DERECHO',
				'code'=>'701',
				'area'=>'CIENCIAS POLITICAS Y JURIDICAS',
			],
			[
				'name'=>'RADIODIAGNOSTICO',
				'code'=>'801',
				'area'=>'PROGRAMA NACIONAL DE FORMACION',
			],
			[
				'name'=>'COMUNICACION SOCIAL',
				'code'=>'504',
				'area'=>'CIENCIAS ECONOMICAS',
			],
			[
				'name'=>'ECONOMIA',
				'code'=>'501',
				'area'=>'CIENCIAS ECONOMICAS',
			],
			[
				'name'=>'ADMINISTRACION',
				'code'=>'502',
				'area'=>'CIENCIAS ECONOMICAS',
			],
			[
				'name'=>'CONTADURIA PUBLICA',
				'code'=>'503',
				'area'=>'CIENCIAS ECONOMICAS',
			]
		];
		
		foreach ($carreras as $carrera) {
			$car=Career::create([
				'name'	=>	$carrera['name'],
				'code'	=>	$carrera['code'],
				'area'	=>	$carrera['area'],
			]);
		}
    }
}
