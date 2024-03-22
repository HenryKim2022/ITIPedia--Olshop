@extends('backend.layouts.master')

@section('title')
    {{ localize('Order Settings') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Payroll') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <form id="generate">



                                <div class="row align-items-end">

                                    <div class="form-group col-md-3">
                                        <label for="">{{ localize('select deliveryman') }}</label>
                                        <select name="deliveryman" class="form-control">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">{{ localize('Select month') }}</label>
                                        <select name="month" id="" class="form-control">
                                            <option value="November">{{localize('November')}}</option>
                                            <option value="October">{{localize('October')}}</option>
                                            <option value="September">{{localize('September')}}</option>
                                            <option value="August">{{localize('August')}}</option>
                                            <option value="July">{{localize('July')}}</option>
                                            <option value="June">{{localize('June')}}</option>
                                            <option value="May">{{localize('May')}}</option>
                                            <option value="April">{{localize('April')}}</option>
                                            <option value="March">{{localize('March')}}</option>
                                            <option value="February">{{localize('February')}}</option>
                                            <option value="January">{{localize('January')}}</option>
                                            <option value="December">{{localize('December')}}</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-3">

                                        <button class="btn btn-primary">{{localize('generate')}}</button>

                                    </div>


                                </div>

                            </form>

                        </div>
                        <div class="card-body">

                            <form action="" method="post">
                                @csrf
                                <div class="row" id="appear">
                                    <input type="hidden" name="deliveryman_id" id="deliveryman" value="">
                                    <input type="hidden" name="month" id="monthname" value="">
                                    <div class="col-md-12">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-header">
                                                <h4>{{localize('salary info')}}</h4>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="form-group col-md-6">
                                                        <label for="">{{localize('Basic salary')}}</label>
                                                        <input type="number" class="form-control" name="basic_sal"
                                                            step="any" value="" readonly="">
                                                    </div>

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="">{{localize('Status')}}</label>
                                                        <select name="status" id="" class="form-control">
                                                            <option value="0">{{localize('Pending')}}</option>
                                                            <option value="1">{{localize('Paid')}}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-header d-flex justify-content-between">
                                                <h4>{{localize('Allowances')}}</h4>

                                                <button class="btn btn-success btn-sm bonus"><i data-feather="plus-circle"></i></button>
                                            </div>
                                            <div class="card-body" id="appearBonus">
                                                <div class="row">
                                                    <div class="form-group col-md-7">
                                                        <label for="">{{localize('title')}}</label>
                                                        <input type="text" class="form-control" name="bonus[0][title]">
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="">{{localize('amount')}}</label>
                                                        <input type="text" class="form-control b_amount"
                                                            name="bonus[0][amount]" value="0">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-7">
                                                        <label for="">{{localize('title')}}</label>
                                                        <input type="text" class="form-control"
                                                            name="bonus[1][title]">
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="">{{localize('amount')}}</label>
                                                        <input type="text" class="form-control b_amount"
                                                            name="bonus[1][amount]" value="0">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-header d-flex justify-content-between">
                                                <h4>{{localize('deduction')}}</h4>

                                                <button class="btn btn-danger btn-sm deduct"><i data-feather="minus-circle"></i></button>
                                            </div>
                                            <div class="card-body" id="appearDeduct">
                                                <div class="row">
                                                    <div class="form-group col-md-7">
                                                        <label for="">{{localize('title')}}</label>
                                                        <input type="text" class="form-control"
                                                            name="deduct[0][title]">
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="">{{localize('amount')}}</label>
                                                        <input type="text" class="form-control d_amount"
                                                            name="deduct[0][amount]" value="0">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-7">
                                                        <label for="">{{localize('title')}}</label>
                                                        <input type="text" class="form-control"
                                                            name="deduct[1][title]">
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="">{{localize('amount')}}</label>
                                                        <input type="text" class="form-control d_amount"
                                                            name="deduct[1][amount]" value="0">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="offset-md-8 col-md-4 mt-3">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-header">
                                                <h4>{{localize('Gross salary')}}</h4>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="">{{localize('Total allowances')}}</label>
                                                    <input type="number" class="form-control" readonly=""
                                                        name="total_al" value="0">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">{{localize('Total deductions')}}</label>
                                                    <input type="number" class="form-control" readonly=""
                                                        name="total_de" value="0">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">{{localize('Net salary')}}</label>
                                                    <input type="number" class="form-control" readonly=""
                                                        name="net_sal" value="0">
                                                </div>


                                                <button type="submit" class="btn btn-primary mt-4">{{localize('Create')}}</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            'use strict'

            feather.replace();

            $('#generate').on('submit', function(e) {

                e.preventDefault();

                var formData = {
                    deliveryman: $("select[name=deliveryman]").val(),
                    month: $("select[name=month]").val()
                };

                $.ajax({
                    method: "GET",
                    data: formData,
                    url: "{{route('admin.deliveryman.get-salary')}}",
                    success: function(response) {

                        $('#deliveryman').val(response.user.id)
                        $('#monthname').val(response.month)

                        $('input[name=basic_sal]').val(response.user.salary ?? 0)
                        $('input[name=net_sal]').val(response.user.salary ?? 0)
                    }
                })


            })



            let i = 2;
            let j = 2;

            function netSal() {
                let sum = 0;
                let allow = parseFloat($('input[name=total_al]').val())
                let deduct = parseFloat($('input[name=total_de]').val())
                let net = parseFloat($('input[name=basic_sal]').val())

                sum = (net + allow) - deduct;

                $('input[name=net_sal]').val(sum)

            }

            function bonusCal() {
                let t_bonus = 0.00;
                $('.b_amount').each(function() {
                    var inputValue = parseFloat($(this).val()) || 0;
                    t_bonus += inputValue;
                });

                return t_bonus;
            }


            function bonusDed() {
                let total_d = 0.00;
                $('.d_amount').each(function() {
                    var inputValue = parseFloat($(this).val()) || 0;
                    total_d += inputValue;
                });

                return total_d
            }

            $(document).on('click', '.bonus', function(e) {

                e.preventDefault();

                $('#appearBonus').append(`
                
                <div class="row remove align-items-end">
                    <div class="form-group col-md-7">
                        <label for="">{{localize('title')}}</label>
                        <input type="text" class="form-control" name="bonus[${i}][title]">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">{{localize('amount')}}</label>
                        <input type="text" class="form-control b_amount" name="bonus[${i}][amount]" value="0">
                    </div>

                    <div class="form-group col-md-2">
                       <button class="btn btn-sm btn-danger delete"><i data-feather="trash-2"></i></button>
                    </div>
                </div>
                
                `);

                i++;

                feather.replace()

            })

            $(document).on('click', '.deduct', function(e) {

                e.preventDefault();

                $('#appearDeduct').append(`
                
                <div class="row remove align-items-end">
                    <div class="form-group col-md-7">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="deduct[${j}][title]">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">amount</label>
                        <input type="text" class="form-control d_amount" name="deduct[${j}][amount]" value="0">
                    </div>

                    <div class="form-group col-md-2">
                       <button class="btn btn-sm btn-danger delete"><i data-feather="trash-2"></i></button>
                    </div>
                </div>
                
                `);

                j++;

                feather.replace()


            })


            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                $(this).closest('.remove').remove();
            })

            $(document).on('keyup', '.b_amount', function() {

                $('input[name=total_al]').val(bonusCal())

                netSal()
            })

            $(document).on('keyup', '.d_amount', function() {
                $('input[name=total_de]').val(bonusDed())
                netSal()
            })

            


        })
    </script>
@endsection
