<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SP_GetAllUsers
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetAllUsers');
        DB::unprepared('
            CREATE PROCEDURE SP_GetAllUsers(
                IN p_Id INTEGER
            )
            BEGIN
                SELECT USRS.id as Id
                      ,USRS.name
                      ,USRS.email
                      ,USRS.rolename
                FROM users as USRS
                WHERE USRS.id != p_Id;
            END
        ');

        // SP_GetAllUserroles
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetAllUserroles');
        DB::unprepared('
            CREATE PROCEDURE SP_GetAllUserroles()
            BEGIN
                SELECT DISTINCT(USRS.rolename)
                FROM users as USRS;
            END
        ');

        // SP_GetUserById
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetUserById');
        DB::unprepared('
            CREATE PROCEDURE SP_GetUserById(
                IN p_Id INTEGER
            )
            BEGIN
                SELECT USRS.id as Id
                      ,USRS.name
                      ,USRS.email
                      ,USRS.rolename
                FROM users as USRS
                WHERE USRS.id = p_Id;
            END
        ');

        // Sp_UpdateUser
        DB::unprepared('DROP PROCEDURE IF EXISTS Sp_UpdateUser');
        DB::unprepared('
            CREATE PROCEDURE Sp_UpdateUser(
                 IN p_Id INTEGER
                ,IN p_Name VARCHAR(50)
                ,IN p_Email VARCHAR(100)
                ,IN p_Rolename VARCHAR(50)
            )
            BEGIN
                UPDATE users as USRS
                SET    USRS.name = p_Name,
                       USRS.email = p_Email,
                       USRS.rolename = p_Rolename
                WHERE  USRS.id = p_Id;
            END
        ');

        // sp_DeleteUser
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_DeleteUser');
        DB::unprepared('
            CREATE PROCEDURE sp_DeleteUser(
                IN p_id INT
            )
            BEGIN
                DELETE FROM users
                WHERE id = p_id;

                SELECT ROW_COUNT() AS affected;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetAllUsers');
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetAllUserroles');
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetUserById');
        DB::unprepared('DROP PROCEDURE IF EXISTS Sp_UpdateUser');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_DeleteUser');
    }
};
