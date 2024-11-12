<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow" style="background-color: #f8f9fa; border-radius: 10px;">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4" style="color: #007bff;">Consulte seu Signo</h3>
                    
                    <form id="signo-form" method="POST" action="zodiac.php">
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label" style="color: #6c757d;">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" 
                                   name="data_nascimento" required style="border: 1px solid #ced4da;">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100" 
                                style="background-color: #007bff; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                            Descobrir meu Signo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
