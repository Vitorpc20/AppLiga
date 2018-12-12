package com.projeto_pds;

import android.app.Notification;
import android.app.PendingIntent;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.NotificationManagerCompat;

public class NotificationUtil {
    // Cria a PendingIntent para abrir a activity da intent
    private static PendingIntent getPendingIntent(Context context, Intent intent, int id){
        TaskStackBuilder stackBuilder = TaskStackBuilder.create(context);
        // Esta linha mantém a activity pai na pilha de atividades
        stackBuilder.addParentStack(intent.getComponent());
        // Configura a intent que vai abrir ao clicar na notificação
        stackBuilder.addNextIntent(intent);
        // Cria a PendingIntent e atualiza caso exista uma com o mesmo id
        PendingIntent p = stackBuilder.getPendingIntent(id, PendingIntent.FLAG_UPDATE_CURRENT);
        return p;
    }

    public static void create(Context context, Intent intent, String contentTitle, String contentText, int id){
        // Cria a PendingIntent (contém a intent original)
        PendingIntent p = getPendingIntent(context, intent, id);
        // Cria a notificacao
        NotificationCompat.Builder b = new NotificationCompat.Builder(context);
        b.setDefaults(Notification.DEFAULT_ALL); // Ativa configurações padrão
        b.setSmallIcon(R.drawable.ic_favorite); // Ícone
        b.setContentTitle(contentTitle); // Título
        b.setContentText(contentText); // Mensagem
        b.setContentIntent(p); // Intent que será chamada ao clicar na notificação
        b.setAutoCancel(true); // Autocancela a notificação ao clicar nela
        NotificationManagerCompat nm = NotificationManagerCompat.from(context);
        // Neste caso a notificação será cancelada automaticamente quando o usuário clicar
        // Mas o id sere para cancelá-la manualmente se necessário
        nm.notify(id, b.build());
    }

    public static void createHeadsUpNotification(Context context, Intent intent, String contentTitle, String contentText, int id){
        // Cria a PendingIntent (contém a intent original)
        PendingIntent p = getPendingIntent(context, intent, id);
        // Cria a notificacao
        NotificationCompat.Builder b = new NotificationCompat.Builder(context);
        b.setDefaults(Notification.DEFAULT_ALL); // Ativa configurações padrão
        b.setSmallIcon(R.drawable.ic_favorite); // Ícone
        b.setContentTitle(contentTitle); // Título
        b.setContentText(contentText); // Mensagem
        b.setContentIntent(p); // Intent que será chamada ao clicar na notificação
        b.setAutoCancel(true); // Autocancela a notificação ao clicar nela
        // Cor da notificação Android 5.0
        b.setColor(Color.BLUE);
        // Heads-up notification
        b.setFullScreenIntent(p, false);
        NotificationManagerCompat nm = NotificationManagerCompat.from(context);
        // Neste caso a notificação será cancelada automaticamente quando o usuário clicar
        // Mas o id sere para cancelá-la manualmente se necessário
        nm.notify(id, b.build());
    }

    public static void cancell(Context context, int id){
        NotificationManagerCompat nm = NotificationManagerCompat.from(context);
        nm.cancel(id);
    }

    public static void cancellAll(Context context){
        NotificationManagerCompat nm = NotificationManagerCompat.from(context);
        nm.cancelAll();
    }
}
