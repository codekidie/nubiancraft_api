<?php
class Controller_Joborders extends Controller_Template
{

	public function action_index()
	{
		$data['joborders'] = Model_Joborder::find('all');
		$this->template->title = "Joborders";
		$this->template->content = View::forge('joborders/index', $data);

	}


	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('joborder');

		if ( ! $data['joborder'] = Model_Joborder::find($id))
		{
			Session::set_flash('error', 'Could not find joborder #'.$id);
			Response::redirect('joborders');
		}

		$this->template->title = "Joborder";
		$this->template->content = View::forge('joborders/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Joborder::validate('create');

			if ($val->run())
			{
				$joborder = Model_Joborder::forge(array(
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'date_schedule' => Input::post('date_schedule'),
					'amount' => Input::post('amount'),
					'description' => Input::post('description'),
					'deposit' => Input::post('deposit'),
					'balance' => Input::post('balance'),
					'conform' => Input::post('conform'),
					'recievedby' => Input::post('recievedby'),
					'claimedby' => Input::post('claimedby'),
				));

				if ($joborder and $joborder->save())
				{
					Session::set_flash('success', 'Added joborder #'.$joborder->id.'.');

					Response::redirect('joborders');
				}

				else
				{
					Session::set_flash('error', 'Could not save joborder.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Joborders";
		$this->template->content = View::forge('joborders/create');

	}
}