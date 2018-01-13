$.get('/client/load/wallets', function (e){
            console.log(e);
            if(e.status !== 'info'){
                $(".wallet-btt").html(`
                    <div>
                        <h2>BTT</h2>
                        <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> `+e.bal+` </div>
                        <button class="btn btn-default" onclick="buyForm()">Buy</button> 
                        <button class="btn btn-default" onclick="sellForm()">Sell</button>
                        <button class="btn btn-default" onclick="sendForm()">Send</button>
                        <br />
                    </div>
                    <br /><br />
                `);
            }else{
                $(".wallet-btt").html(`
                <div>
                    <h2>BTT</h2>
                    <div style="padding: 2em;font-size: 21px;"><i class="fa fa-database"></i> 0.00000000 </div>
                    <button class="btn btn-default">Buy</button> 
                    <button class="btn btn-default">Sell</button>
                    <button class="btn btn-default">Send</button>
                    <br />
                </div>
                <br /><br />
            `);
            }
        });

        $('#lendForm').click( function (e){
            e.preventDefault();
            $("#loan-form").toggle();
        });

        function buyForm(){
            $("#buy-form").toggle();
        }
        function sellForm(){
            $("#sell-form").toggle();
        }
        function sendForm(){
            $("#send-form").toggle();
        }

        // calculate loan
        function calculatePer() {
            // body
            var amount = $("#amount").val();
            var rate = 0.02;

            // calculate price
            var percentInterest = amount * rate;
            // var total = parseInt(amount) + parseInt(percentInterest);

            $('.interest').html(`
                <b>Interest charge:</b> `+percentInterest+` <br />
            `);
        }

        // requesting loan
        function requestLoan()
        {
            // body
            var amount = $("#amount").val();
            var rate = 0.02;
            var token = $("input[name=_token]").val();

            // calculate price
            var percentInterest = amount * rate;

            var data = {
                amount: amount,
                interest: percentInterest,
                rate: rate,
                _token: token
            };

            $.ajax({
                type: "post",
                url:  "/send/loan/request",
                data: data,
                success: function (data){
                    console.log(data);
                    if(data.status == 'success'){
                        $('.success_msg').html(`
                            <div class="alert alert-success">
                                <p class="text-success">`+data.message+`</p>
                            </div>
                        `);
                    }else{
                        $('.error_msg').html(`
                            <div class="alert alert-danger">
                                <p class="text-danger">`+data.message+`</p>
                            </div>
                        `);
                    }
                },
                error: function (data){
                    alert('fail to send request....');
                }
            });

            return false;
        }

        // request buy
        function buyBtt(){
        
            $(".error_msg").html(`
                <div class="alert alert-danger">
                    <p class="text-danger">insufficient balance !!</p>
                </div>
            `);
            return false;
        }

        // request sell
        function sellBtt(){
        
            var token = $("input[name=_token]").val();
            var amount = $("#sell_amount").val();

            $.ajax({
                url: '/account/sell/btt',
                type: 'post',
                dataType: 'json',
                data: {
                    _token:token,
                    amount:amount
                },
                success: function (data){
                    console.log(data);
                    if(data.status == 'success'){
                        $('.success_msg').html(`
                            <div class="alert alert-success">
                                <p class="text-success">`+data.message+`</p>
                            </div>
                        `);
                    }else{
                        $('.error_msg').html(`
                            <div class="alert alert-danger">
                                <p class="text-danger">`+data.message+`</p>
                            </div>
                        `);
                    }
                },
                error: function (data){
                    alert('Error, fail to send request !');
                }
            });
            
            return false;
        }